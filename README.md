# PHP Project with Docker, Apache and MySQL

## Docker

### Install docker -> https://docs.docker.com/engine/install/ubuntu/

sudo apt-get update

sudo apt-get install \
    ca-certificates \
    curl \
    gnupg \
    lsb-release

sudo mkdir -p /etc/apt/keyrings
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg

echo \
  "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu \
  $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null


sudo apt-get update
sudo apt-get install docker-ce docker-ce-cli containerd.io docker-compose-plugin

### Get project frpm github
cd /var/www/html
sudo git clone https://github.com/andreserra03/BlogPhpSol.git
sudo chmod 777 /var/www/html -R
sudo ln -s /var/www/html/BlogPhpSol ~/Desktop/

### Iniciar projeto
dentro do projeto: sudo docker compose up -d
database: http://localhost:8080 -> user: root / password: Gh4nO7!#ft -> import sql file -> src/data/database.sql
website: http://localhost

