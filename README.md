<p align="center">
  <h3 align="center">Simple Sacco Reports</h3>

  <p align="center">
    This is a simple sacco report generator done in Laravel and Vue
   <br />
    <br />
    <a href="http://104.236.56.196:3030/">View Demo</a>
    
  </p>
</p>



<!-- TABLE OF CONTENTS -->
## Table of Contents

* [About the Project](#about-the-project)
  * [Built With](#built-with)
* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Installation](#installation)
* [Usage](#usage)
* [RoadMap](#roadmap)
* [License](#license)
* [Contact](#contact)
* [Acknowledgements](#acknowledgements)



<!-- ABOUT THE PROJECT -->
## About The Project

This is a simple laravel application that has been dockerized. The front end is done in vue js and boostrap for css. The application aggregates sacco information from an sql file found in init and displays information in a table. It uses the basic laravel api and in future will include resources.

A list of resources that I found helpful are listed in the acknowledgements.

### Built With
The application has been built in
* [Bootstrap](https://getbootstrap.com)
* [Vue](https://vuejs.org/)
* [Laravel](https://laravel.com)
* [Docker](https://www.docker.com/)
* [Mysql](https://www.mysql.com/)

<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple example steps.

### Prerequisites

* docker

### Installation

1. Clone the repo
```sh
git clone https://github.com/voleche09/laravel_docker_report.git
```
2. CD into the directory and run docker-compose
```sh
docker-compose up --build
```
3. Install laravel dependencies
```sh
docker-compose run --rm composer install
```
4. Install node dependencies and compile the resources
```sh
docker-compose run --rm npm install
docker-compose run --rm npm run dev
```

<!-- USAGE EXAMPLES -->
## Usage
Once everything is up and running you can view the report on [YOUR_HOST_IP:3030]


<!-- ROADMAP -->
## Roadmap

Some known issues include:
* On Linux you need to run chmod -R 777 *
* You need to wait for the database to be uploaded to view reports
* Unit tests not done

<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.

<!-- CONTACT -->
## Contact

Project Link: [https://github.com/voleche09/laravel_docker_report/](https://github.com/voleche09/laravel_docker_report)


<!-- ACKNOWLEDGEMENTS -->
## Acknowledgements
* [Freecodecamp](https://www.freecodecamp.org/)
* [Laravel](https://laravel.com/)
