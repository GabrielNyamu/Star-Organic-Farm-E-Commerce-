# Star Organic Farm: Full-Stack E-Commerce Platform 

##  Project Overview
**Star Organic Farm** is a full-featured web application designed to connect local farmers directly with consumers. This platform digitizes the supply chain for organic produce, managing everything from inventory tracking to order fulfillment.

This project demonstrates my core competency in **Full Stack Development** using the LAMP/WAMP stack, serving as the foundational application layer into which I am currently integrating predictive AI models.

##  Key Features
* **Role-Based Access Control:** Distinct portals for **Admins** (Inventory/Sales management) and **Customers** (Shopping/Order tracking).
* **Dynamic Inventory Management:** Real-time updates of stock levels for organic produce using PHP and SQL.
* **Secure Transaction Flow:** Implemented secure checkout logic and session management.
* **Database Optimization:** Efficient SQL schema design to handle complex relationships between Users, Orders, and Products.

##  Tech Stack
* **Frontend:** HTML5, CSS3, JavaScript (Vanilla)
* **Backend:** PHP (Native)
* **Database:** MySQL / SQL
* **Version Control:** Git

##  System Architecture
The application is built on a standard 3-tier architecture:
1.  **Presentation Layer:** HTML/CSS/JS frontend for a responsive user interface.
2.  **Application Layer:** PHP scripts handle business logic, form processing, and authentication.
3.  **Data Layer:** SQL database storing persistent user and transaction data.

##  Future AI Integrations (Roadmap)
As an AI Engineer, I am continuously upgrading this platform to include:
* **Demand Forecasting:** Implementing a Time-Series model (Arima) to predict stock shortages based on seasonal trends.
* **Smart Recommendations:** Adding a Collaborative Filtering engine to suggest products based on user purchase history.

##  How to Run
1.  **Clone the repository:**
    ```bash
    git clone [https://github.com/GabrielNyamu/Star-Organic-Farm-E-Commerce-.git](https://github.com/GabrielNyamu/Star-Organic-Farm-E-Commerce-.git)
    ```
2.  **Database Setup:**
    * Create a database named `star_organic` (or check the SQL file for the name).
    * Import the provided `.sql` file into your MySQL server (via phpMyAdmin or CLI).
    * Update your `db_connect.php` (or config file) with your database credentials.
3.  **Launch Server:**
    * **Option A (XAMPP/WAMP):** Move the project folder to `htdocs` or `www` and access via `localhost/Star-Organic-Farm...`
    * **Option B (PHP CLI):** Run the following command in the project root:
      ```bash
      php -S localhost:8000
      ```

## 👤 Author
**Gabriel Ng'ang'a**
* **Role:** AI/ML Engineer & Full Stack Developer
* [LinkedIn](https://www.linkedin.com/in/gabriel-ng-ang-a-0a5894363/)
* [Portfolio](https://gabrielnganga.github.io)
