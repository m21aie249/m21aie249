# CSL7510 Asignment1 Q2

Docker application deployment

Note: Per response by Instructor to a question on GC, using a base OS image is allowed. Everything else would be installed from scratch.

As in Q1 of the assignment, the same Phonebook Application would be used and containerized for this part of the assignment. Starting from a base ubuntu 22.04 image, nginx, php and mysql would be setup and deployed.

Only one docker image [1][3] is created hosting all three services nginx+php-fpm and mysql [2][4].

Nginx and PHP interaction tested OK, but application does not work in this submission due to PHP not able to talk to MySQL within the container. 

To Build:

git clone git@github.com:m21aie249/m21aie249.git

cd docker

docker build -t mysql:mysql1.0 .

To Run:

docker run -d -p 9090:80 -p 3066:3066 mysql:mysql1.0 


References / Acknowledgements:

[1]: PHP+Nginx+Docker Template: https://github.com/walternascimentobarroso/php-nginx-docker

[2]: How To Install Linux, Nginx, MySQL, PHP (LEMP stack) on Ubuntu 22.04: https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-on-ubuntu-22-04

[3]: Docker Documentation: https://docs.docker.com/get-started/

[4]: How to create Docker Images with a Dockerfile on Ubuntu 22.04 LTS: https://www.howtoforge.com/tutorial/how-to-create-docker-images-with-dockerfile/
