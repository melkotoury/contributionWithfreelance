# How to Install Iamafilm

1- 
```
#!shell

composer install
```

2- 
```
#!shell

create a database with name iamafilm
```

3- 
```
#!shell

php artisan migrate
```

4- 
```
#!shell

composer dump-autoload
```

5- 
```
#!shell

php artisan db:seed
```
. please read the seeding note below 


# Seeding Note


you should make this tricks while you are seeding :

1. first start with seeding users table alone and comment the rest of seeders

2. seed country,users,site setting tables one time only .