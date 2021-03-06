# AndC Website

This is the code for the AndC company website. This was developed on PHP to make use of templating and component includes, and uses very minimal back-end code (no proper routing or controller logic). Routing is currently handled in the .htaccess file. This code is intended to be connected to a proper backend like a CMS.

---

### Stack and tools used
- **npm** - (https://www.npmjs.com/) for installing necessary packages
- **PHP (vanilla)** - for templating and component sharing
- **gulp** - (https://gulpjs.com/) build tool used to compile Sass
- **Sass** - (https://sass-lang.com/) CSS preprocessor used to add vendor prefixes, concatenate stylesheets, and overall better CSS
- **jQuery** (v3.5.1) - (https://jquery.com/) for some interactive components

---

### Development
1. Run a server that supports PHP (e.g. MAMP (https://www.mamp.info/))
1. Install all necessary packages: ```npm install```
1. Build Sass:
    - ```gulp build``` to build the assets once
    - ```gulp watch``` to watch for changes as you develop
    - input dir: ```assets/styles/sass```
    - output file: ```assets/styles/css/all_styles.css```

### Before releasing
1. Set $ROOTDIR to "prod" in settings.php. (Currently it's set to "test" on the FTP server).
1. Upload the .htaccess file to the FTP server.
