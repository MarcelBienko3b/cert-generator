# cert-generator

## Screenshot

![Screenshot from website](https://i.ibb.co/q14QVKB/screely-1655583722233.png)

## HOW TO

- Download .zip of this repository
- Install xampp on your PC
- Unzip everything to main htdocs folder of xampp (i.e. C:/xampp/htdocs)
```
C:
│
└─── xampp
     │  
     └─── htdocs
          │   
          │ index.php
          │ main.css
          │ db.sql
          │ font.ttf                [ annot. 1 ]
          │ cert-background.jpg     [ annot. 2 ]
          │ README.md
          │
          └─── Certificates         [ This folder is necessary for app to work properly,
          │    │                      it will contain generated certificates ]
          │    │ README.md
          │ 
          └─── scripts
               │
               │ ...
```
- Run xampp with Apache and MySQL modules started
- Open cmd and navigate to xampp mysql folder (i.e. C:/xampp/mysql/bin)
- Run `mysql -u root -p` command with blank password (just hit enter)
- Run `source path_to_sql_file` command (i.e. C:/xampp/htdocs/db.sql)
- Open localhost in your web browser
---
## Annotations

> `[ annot. 1 ]`\
> Upload here any font to use for your certificate, but rename it to `font.ttf`.

> `[ annot. 2 ]`\
> Upload here any background image for you certificate, but rename it to cert-background.jpg. Remember, it must be .jpg format. If you upload image in other resolution, you must change X and Y coordinates of text placement in `Generate` section of the website.
