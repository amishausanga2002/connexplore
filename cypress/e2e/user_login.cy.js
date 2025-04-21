describe('User Login Flow', () => {
    it('logs in the user successfully and lands on the dashboard', () => {
      cy.visit('http://localhost:8000/login');

      cy.get('input[name=email]').type('cb011429@students.apiit.lk');
      cy.get('input[name=password]').type('12345678');
      cy.get('button[type=submit]').click();

      // Confirm redirected to dashboard (you can adjust the URL if needed)
      cy.url().should('include', '/dashboard');

      // Check for an actual visible text from your UI
      cy.contains('Welcome, Nishika Jayawardene!').should('exist'); // ✅ this exists
      cy.contains('cb011429@students.apiit.lk').should('exist'); // also exists
    });
  });
