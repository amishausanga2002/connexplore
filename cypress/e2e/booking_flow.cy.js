describe('Booking Flow Test', () => {
    it('books a sport successfully from the dashboard', () => {
        // Step 1: Visit login page
        cy.visit('http://localhost:8000/login');

        // Step 2: Login
        cy.get('input[name=email]').type('cb011429@students.apiit.lk');
        cy.get('input[name=password]').type('12345678');
        cy.get('button[type=submit]').click();



        cy.contains('Go to Home Page').click();
        cy.url().should('include', '/index');
        cy.contains('Book Now').click();
        cy.url().should('include', '/bookings/create');

        // Step 5: Ensure redirected to index.blade.php
        cy.url().should('include', '/'); // or '/index' depending on your route
        cy.contains('Book Now').should('exist');

        // Step 6: Click "Book Now" button
        cy.contains('Book Now').click();

        // Step 7: Fill the booking form
        cy.get('input[placeholder="Enter your CBnumber"]').type('CB011579');
        cy.contains('label', 'Sport').next('select').select(1);
        cy.contains('label', 'Location').next('select').select('1');
        cy.get('input[name=date]').type('2025-04-23');

        // Step 4: Wait for time slots to load and select
        cy.intercept('GET', '**/booking/availability**').as('getTimeSlots');
        cy.get('input[name=date]').blur(); // Trigger time slot fetch
        cy.wait('@getTimeSlots');
        cy.get('select[name="time_slot"]').should('not.be.disabled');
        cy.get('select[name="time_slot"]').select('10:00-12:00');
        cy.wait(1000);
        // Step 5: Select set
        cy.contains('label', 'Set').next('select').select('1');

        // Step 8: Submit the form
        cy.get('#book_now_btn').first().click();

        cy.url().should('include', '/sports-page');

        // Step 7: Assert success message is visible
        cy.contains('Booking created successfully.').should('exist');
    });
});
