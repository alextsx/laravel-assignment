@echo off

if not exist database\database.sqlite (
   echo Database does not exist. Creating a new one...
   echo. 2> database\database.sqlite
) 

call npm install && (
   echo Node.js dependencies installed successfully
   
   call composer install && (
      echo PHP dependencies installed successfully
      
      call copy .env.example .env && (
         echo Copied .env file  
      ) || (
         echo Failed to copy .env file
      )
   ) || (
      echo Composer install failed
   )
   
) || (
   echo Node.js install failed
)

call php artisan key:generate && (
   echo App key generated
) || (
   echo App key generation failed  
)

call php artisan migrate:fresh --seed && (
   echo Database migrated and seeded
) || (
   echo Database migration failed
) 

mklink /J public\storage storage\app\public && (
   echo Storage symbolic link created   
) || (
   echo Symbolic link failed
)