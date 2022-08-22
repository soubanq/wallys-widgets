<h1>Wally's Widgets</h1>

- Run `composer install`.
- Create an .env file. Specify a database. Run `php artisan migrate`.
- User interface for adding pack sizes and calculating orders can be found at `/` (homepage).
- Main logic is in `Widget.php` model.

Any questions, hit me up at soubanquadri@gmail.com

Happy widgeting!

---------------------

Wally’s Widget Company is a widget wholesaler.

They sell widgets in a variety of pack sizes:

- 250 widgets
- 500 widgets
- 1,000 widgets
- 2,000 widgets
- 5,000 widgets

Their customers can order any number of widgets, but they will always be given complete packs.
The company wants to be able fulfil all orders by according to the following rules:

- Only whole packs can be sent. Packs cannot be broken open.
- Within the constraints of Rule 1 above, send out no more widgets than necessary to fulfil the order.
- Within the constraints of Rules 1 & 2 above, send out as few packs as possible to fulfil each order.

So, for example;

![Screenshot 2022-08-22 115504](https://user-images.githubusercontent.com/22747904/185904746-fd253b23-bc29-402d-8379-8bf896e64b8e.png)

Write a program that will tell Wally’s Widgets what packs to send out, for any given order size.

Keep your program flexible, so that new packs sizes may be added, or existing pack sizes changed or discarded, at a later date with minimal adjustments to your program.
