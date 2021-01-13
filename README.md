# mpu.com.au

MPU site code - copyright to MPU, do not reuse without express permission!

## Requirements

You will need to install the docker and docker-compose packages within pip
```bash
pip install docker docker-composer
```

## Instructions

Ensure you have filled out your docker/.env
To start the container, run the start.sh
```bash
./start.sh (dev/stg/prd)
```
This will build the image, start the container, install composer and run a composer install.


### dev/stg Environment
Add the url for the environment you added to your hosts file
```
127.0.0.1  <domain>
```

After this is done,  fill out the code/.env and then load the domain you added to your hosts file


### prod Environment
Ensure DNS is setup for the domain to point to the server that this is running on.
The nginx proxy should pickup the domain and pass it to this container.
