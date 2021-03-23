# Generate  PHP
An application that can be used to generate Invoices. 


- Users should be able to add multiple line items by providing the following details.
	- Name
	- Quantity
	- Unit Price (in $)
	- Tax ( should be one of these 0%, 1%, 5%, 10%)

- The following should be calculated and displayed on the page
	- Line Total against each item
	- Subtotal without tax
	- Subtotal with tax
- Users should be able to provide a discount on top of the Subtotal with tax. Discount can be a percentage(%) value or an amount ($).
- Total Amount should be shown at the bottom of the list after applying the discount.
- A "Generate Invoice" button should be provided and upon clicking it, all the information should be neatly displayed in a printable format.
