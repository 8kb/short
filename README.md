# shortUrl
Simple shortening of links.
As a storage uses MySQL.
Working with the storage is encapsulated in a separate class, which makes it easy to replace the storage with another.
Added text pages with articles.
Language strings are placed in a separate block, for ease of translation / adaptation.
Templates are separated from logic.
Simple MVC nano-framework inside.
(Not pure Model, only DAO, not pure View, only template => for high-load).
The script saves not only the information necessary for the work, but also the time when the link was created, the IP created the link and the time the link was last used (updated each time the link is clicked). Added for administration needs. Is present only in the database, and is not used by the script.

# Installation
To install, create (from config.sample.php) and edit the config.php file.
Set the installation flag (if not installed).
Go to the site.
Then uncheck the installation flag
