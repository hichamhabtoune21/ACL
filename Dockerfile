FROM php:8.2-apache

# Aggiorna il sistema e installa le dipendenze necessarie
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install gettext && docker-php-ext-enable gettext

# Installa netcat (nc)
RUN apt-get install -y netcat

# Usa l'immagine di base di Node.js
FROM node:latest

# Imposta la directory di lavoro per il webservice
WORKDIR /usr/src/app

# Copia i file di dipendenza nella directory di lavoro
COPY webservice/package*.json ./

# Installa le dipendenze
RUN npm install

# Copia il resto del codice nell'immagine
COPY webservice ./

# Avvia l'applicazione Node.js
CMD ["npm", "start"]
