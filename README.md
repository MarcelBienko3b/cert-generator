# cert-generator

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
          |    |                      it will contain generated certificates ]
          |    |
          |    | README.md
          |
          └─── scripts
               │
               │ cert-generate.php  [ annot. 3 ]
               │ ...
```
- Run xampp with Apache and MySQL modules started
- Open cmd and navigate to xampp mysql folder (i.e. C:/xampp/mysql/bin)
- Run 'mysql -u root -p' command with blank password (just hit enter)
- Run 'source path_to_sql_file' command (i.e. C:/xampp/htdocs/db.sql)
- Open localhost in your web browser
---
## Annotations

> `[ annot. 1 ]`\
> Upload here any font to use for your certificate, but rename it to `font.ttf`.

> `[ annot. 2 ]`\
> Upload here any background image for you certificate, but rename it to cert-background.jpg. Remember, it must be .jpg format. If you upload image in other resolution, you must change X and Y coordinates of text placement in `cert-generate.php` file like shown in `[ annot. 3 ]` section.

> `[ annot. 3 ]`\
> To adjust the font size, go to line `17.` and change second parameter of function `imagettftext` like shown:
> > Change font size `18` 🠆 `24`:
> > ```
> > imagettftext($image, 18, 0, 220, 280, $color, $font, $name);
> > ```
> > ```
> > imagettftext($image, 24, 0, 220, 280, $color, $font, $name);
> > ```
> To adjust the text placement, go to line `17.` and change third and fourth parameter of function `imagettftext` like shown:
> > Change font size `220` 🠆 `200` to change X coordinates:
> > ```
> > imagettftext($image, 18, 0, 220, 280, $color, $font, $name);
> > ```
> > ```
> > imagettftext($image, 24, 0, 200, 280, $color, $font, $name);
> > ```
> > Change font size `280` 🠆 `140` to change Y coordinates:
> > ```
> > imagettftext($image, 18, 0, 220, 280, $color, $font, $name);
> > ```
> > ```
> > imagettftext($image, 24, 0, 200, 140, $color, $font, $name);
> > ```
> To adjust the font color, go to line `15.` and change rgb values like shown:
> > Change `($image, 25, 25, 25)` 🠆 `($image, 80, 80, 80)`
> > ```
> > $color = imagecolorallocate($image, 25, 25, 25);
> > ```
> > ```
> > $color = imagecolorallocate($image, 80, 80, 80);
> > ```
