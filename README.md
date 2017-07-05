# geocheckins

## demo

The demo instance of the application has a default user registered `admin@admin.com` with password `123` and it is available at:

http://geocheckins.hneto.com

## csv-converter

It is provided a script that converts the format of existing data files to a regular csv format.

The obtained format is shown below.
```
id    |       latitude        |       longitude       
---------+-----------------------+-----------------------
101759 |            45.5405832 |           -73.5965186
101762 |            45.5154736 |           -73.5643264
449060 |             38.962166 |            -94.604425
...
```

The `csv-converter` script will translate it to a regular csv file, as shown below.

```csv
id,latitude,longitude
101759,45.5405832,-73.5965186
101762,45.5154736,-73.5643264
449060,38.962166,-94.604425
...
```

Using the converted csv file it is possible to import data to any database table.
