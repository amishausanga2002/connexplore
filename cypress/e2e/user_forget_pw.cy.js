describe('Verify forget password function', function () {
    const apiKey = "6317bb739fe3bbf3f5856aebace95d605857dafe9afbe76e51d4a0248972bf6b"; // Replace with your Mailslurp API key
    before(function () {
        return cy
            .mailslurp({
                apiKey: apiKey, // Ensure you set this in your Cypress environment variables
            })
            .then(mailslurp => mailslurp.createInbox())
            .then(inbox => {
                // save inbox id and email address to this (make sure you use function and not arrow syntax)
                cy.wrap(inbox.id).as('inboxId');
                cy.wrap(inbox.emailAddress).as('emailAddress');
            });
    });
    it('Reset password', async function () {

        expect(this.inboxId).to.exist;
        expect(this.emailAddress).to.contain('@mailslurp');
        //cy.wait(30000); // Wait for 6 seconds to ensure the inbox is ready
        cy.visit('http://localhost:8000/register');
        cy.wait(600);
        const email = this.emailAddress;
        const name = this.inboxId;
        const password = '12345678';

        // Step 2: Fill the registration form
        cy.get('input[name=name]').clear().type(name);
        cy.get('input[name=email]').clear().type(email);
        cy.get('input[name=password]').clear().type(password);
        cy.get('input[name=password_confirmation]').clear().type(password);

        // Step 3: Submit the form
        cy.get('button[type=submit]').click();

        cy.mailslurp({
            apiKey: apiKey,
        }).then(mailslurp => {
            // Ensure 'name' is the inbox ID
            const inboxId = name; // Replace 'name' with the actual inbox ID variable
            cy.log('Waiting for email in inbox:', inboxId);

            // Wait for the latest email with an increased timeout
            return mailslurp.waitForLatestEmail(inboxId, 60000); // Increase timeout to 60 seconds
        }).then(receivedEmail => {
            if (!receivedEmail) {
                throw new Error('No email received within the timeout period.');
            }

            const otpRegex = /\b\d{6}\b/; // Regex to match a 6-digit OTP
            const otp = receivedEmail.body.match(otpRegex)[0];
            cy.log('OTP:', otp); // Log the OTP for debugging

            // Step 4: Ensure redirection to OTP page
            cy.url().should('include', '/verify-otp');
            cy.contains('Verify OTP').should('exist');

            // Step 6: Enter the OTP and verify
            cy.get('input[name=otp]').type(otp);
            cy.get('button[type=submit]').click();

            cy.wait(10000); // Wait for 10 seconds

            // Step 7: Final assertion
            cy.url().should('include', '/user/dashboard'); // Update with the correct success page
        });
    });
});
