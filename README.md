# MicroService Web-Based

### <summary><strong>Tools:</strong></summary>
<p>
    <img src="https://img.shields.io/badge/Code-Go-blue?logo=go&logoColor=white" />
    <img src="https://img.shields.io/badge/Server-Node.js-green?logo=node.js&logoColor=white" />
    <img src="https://img.shields.io/badge/Framework-Laravel-red?logo=laravel&logoColor=white" />
    <img src="https://img.shields.io/badge/Code-PHP-blue?logo=php" />
    <img src="https://img.shields.io/badge/Database-MySQL-orange?logo=mysql" />
    <img src="https://img.shields.io/badge/Database-SQLyog-red?logo=sqlyog" />
    <img src="https://img.shields.io/badge/Server-XAMPP-yellow?logo=apache" />
    <img src="https://img.shields.io/badge/Tool-npm-red?logo=npm&logoColor=white" />
    <img src="https://img.shields.io/badge/API-REST%20API-blue?logo=swagger&logoColor=white" />
    <img src="https://img.shields.io/badge/Tool-Postman-orange?logo=postman&logoColor=white" />
</p>

# Web Application for Vocational Faculty IT Del Information System

This web-based application has been developed for the Information System of the Vocational Faculty of IT Del. It allows users to access various information regarding the Vocational Faculty of IT Del.

## Technologies Used

This application is built using several programming languages and frameworks:

- **Back-end:** Go, Node.js, PHP with Laravel Framework
- **Database:** MySQL
- **Frontend:** JavaScript

## Application Architecture

### Monolithic Architecture

The monolithic architecture refers to a self-contained application that includes all functions, databases, and user interfaces within a single codebase. This approach provides simplicity and ease of development, but it can become complex and harder to maintain as the application evolves. Additionally, having all functions, databases, and user interfaces within a single codebase may slow down the development process. It can also hinder scalability and the application's resilience to rapid changes and user demands.

### Microservice Architecture

This application utilizes a microservice architecture, dividing the application into smaller, independent services. Each service has its own database, ensuring that one service does not affect the others. However, despite being independent, these services are still interconnected and communicate via standard REST API HTTP requests.

#### Available Services

1. **Dashboard Service** - Accessible at `localhost:8001/admin/beranda`
2. **About Service** - Accessible at `localhost:8002/admin/tentang`
3. **Study Program Service** - Accessible at `localhost:8003/admin/prodi`
4. **Authentication Service** - Accessible at `localhost:7009/admin/autentikasi`

Each service runs independently and uses a different port to ensure clear separation between services. If one service encounters an issue, the others can continue to operate without disruption.

## Database

In the back-end, each service has its own database. This web application consists of four services, each with its own database. Each service is designed to operate on a separate port to avoid conflicts.

### Architecture Diagram

In the attached diagram, you can see the microservice architecture used in the development of the Vocational Faculty website application. REST API serves as the bridge between the web UI and the available services, allowing them to be accessed by multiple platforms without being restricted to a single programming language.

## Conclusion

This web application combines various technologies and architectural approaches to create an efficient and manageable information system for the Vocational Faculty of IT Del. The use of microservice architecture ensures that the application remains scalable and resilient to rapid changes and user demands.

## License

This project is licensed under the [MIT License](LICENSE).

## Contribution & Feedback:
We are very open to contributions and feedback from the community. For more information or any questions, feel free to contact us via [spardosi12@gmail.com](mailto:spardosi12@gmail.com) or connect with me on [LinkedIn](https://www.linkedin.com/in/sion-pardosi-961607254/).
