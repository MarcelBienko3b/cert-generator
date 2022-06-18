# cert-generator

## HOW TO

- Download .zip of this repository
- Install xampp on your PC
- Unzip everything to main htdocs folder of xampp (i.e. C:/xampp/htdocs)
```
C:
│
└───xampp
    │  
    └───htdocs
        │   
        │ index.php
        │ main.css
        │ db.sql
        │ font.ttf
        │ cert-background.jpg

        
```
- Run xampp with Apache and MySQL modules started
- Open cmd and navigate to xampp mysql folder (i.e. C:/xampp/mysql/bin)
- Run 'mysql -u root -p' command with blank password (just hit enter)
- Run 'source path_to_sql_file' command (i.e. C:/xampp/htdocs/db.sql)
- Open localhost in your web browser