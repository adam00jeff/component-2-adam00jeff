# Component 2 - Submission - Adam Jeffreson c3263312

<p>
Initial setup: Clone to your workspace. You will need to:
</p>
<ul>
<li><b>composer install</b> (to populate the vendor folder)</li>
<li><b>npm install && npm run dev</b> (to populate node_modules)</li>
<li><b>cp .env.example .env</b> to create your own .env file</li>
<li><b>php artisan key:generate</b> to add a key to the .env file</li>
<li><b>php artisan migrate:fresh --seed</b> to seed the required data</li>
</ul>
<p><b>Test Users:</b> This is a development model, and seeds admin users with placeholder passwords.
Remove the marked lines from UserSeeder.php before production.</p>
<p>
<b>Component 2</b>
<p>This website is for submission of Component 2 of Advanced Web Engineering</p>
<p>This site is required to demonstrate the following:
<ul>
<li>Laravel Models, Views and Controllers</li>
<li>Routing and use of HTTP verbs</li>
<li>Blade and View Templates or Components</li>
<li>Databases</li>
<li>Authentication/Users</li>
<li>Version Control and Professional Practice</li>
</ul></p>

<b>Functionality</b>
<p>The site allows shopping, searching and filtering of "Products". Products are filtered and displayed in a number of views to demonstrate different functionality and requirements:<br>
<ul>
<li>Laravel Models, Views and Controllers</li>
<ul>
<li>Models: Models are used for Product, ProductType and User tables. The User model, factories and seeders are Scaffolded and in some cases adapted for the site.</li>
<li>Views: Using blades and components views are shown depending on Routes and user queries.</li>
<li>Controllers: ProductController handles requests for Routes and processes functions returning views and redirects as required</li>
</ul>
<li>Routing and use of HTTP verbs</li>
<ul>
<li>Routing: (display routes via: Web.php or php artisan route:list). The routes available to navigate and interact with the site. Accessing a Route is the primary way to call the functions of the Site. 
Route requests sent to the ProductController class. Some routes are protected routes for varying user levels. Others contain parameters passed in through selections and filtering.
Some Routes (e.g index) are called from multiple paths and are sorted by the called name (e.g. "product added" or "home").</li>
<li>HTTP verbs: All routes are defined with HTTP verbs, "GET" "POST "PUT" "DELETE" are used in the site. </li>
</ul>
<li>Blade and View Templates or Components</li>
<ul>
<li>Blade and View Templates & Components: The main layout template used is app.blade, app.blade contains components such as the dropdowns and links to the login/ register pages which use various components such as the application logo.
App.blade also includes the menu.blade to allow navigation through the site, this component has various auth checks to display access to functions of the site depending on user level.
Blades and views are passed data from Routes via the product controller to display filtered or queried information from requested database tables.</li>
</ul>
<li>Databases</li>
<ul>
<li>The site uses a number of Tables in a single Database, some of these are scaffolded as part of the frameworks such as the users table. Products and Product types are created from migrations within the project. The users table is also amended by a migration to add the "is admin" column
The databases are created via migrations, and then seeded via the DatabaseSeeder.php, which calls the 3 required seeders for the database tables. Products, ProductTypes and Users are seeded. <b>ADMIN PROFILES ARE SEEDED FOR TESTING AND DEMONSTRATION, REMOVE THESE LINES IF THE SITE IS PUBLISHED.</b></li>
</ul>
<li>Authentication/Users</li>
<ul>
<li>Authentication: Users are authenticated by @auth checks such as @can('edit-users). Routes are also protected with Gates and Middleware checks for 'is admin'. Users can be created, but admins cannot, this allows only the database admin to manually edit tables to determine admins once the seeded users are removed.</li>
<li>Users: There are 3 access levels to the site: Open, the default level, no user is signed in, products can be viewed and searched. User, the basic user level, users can view, sort and filter products.
Users may also select a product and add it to their cart. This allows access to the 'cart' view, which displays the users selected products and has some placeholder buttons for checkout functions which have not been added at this stage.
The Admin level is the last and provides two additional protected views to admins, these views allow products to be added and users managed. A third admin view becomes available when a product is selected, as the "buy" button for logged-in users
is replaced with a button to load the edit-page for the selected product.</li>
</ul>
<li>Version Control and Professional Practice</li>
<ul>
<li>Version Control: This project is hosted to GitHub: https://github.com/comp-bkt/component-2-adam00jeff</li>
<li>Professional Practice: See GitHub link above for full version control history, site is commented, formatted and scaffolded as appropriate.
Databases are seeded and migrated and component parts are created with relevant php Artisan commands. Gates and Middleware are used to protect access around the site, user data and passwords are hashed and protected via appropriate framework methods.</li>
</ul>
</ul>
