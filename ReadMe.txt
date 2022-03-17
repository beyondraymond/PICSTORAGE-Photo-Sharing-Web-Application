PICSTORAGE | README 

Documentation Made by: Mar Danniel Ginturo

GROUP NAME: 
MEMBERS: 
John Raymond Arriesgado
Mar Danniel Ginturo
Drexmir Mentiza
Gabriel Gueverra

v1.0 | Picstorage

Changes Author: John Raymond Arriesgado

Changes:

Controller
- Added Homepage Controller

Model
- Added Homepage_model

Views
- Added editProfile_view
- Added homepage_view
- Added uploadPhoto_view

JS
- uploadImage

CSS
- editPhotoStyle
- homepageStyle

Note: I dunno other changes, pastate nalang hihihi - Mar

=====================================================================================================================

v2.0 | Picstorage

Changes Author: Mar Danniel Ginturo
Changes:

- Added .htaccess to root folder for url access (from localhost/finalproject/index.php/class/func/etc to localhost/finalproject/class/func/etc)
- Change config->index_page ('index.php' -> '')
- Helpers, libraries, models, added to autoload
- Added Search function
- Added Pagination
- Added Session

Controller
- added Search Controller

Model
- Reorganized models
	Reason for reorganization: Proper distinction on what to CRUD from database
	- deleted Homepage_model
	- added User_model
		- added functions
			- get_person (from Homepage_model)
			- update_person (from Homepage_model)
	- added Picture_model
		- added functions
			- get_pictures (from Homepage_model)
			- get_single_picture (from Homepage_model)
			- delete_picture (from Homepage_model)
			- upload_picture (from Homepage_model)
			- get_pictures_results (New)

Views
- Added search_view
- Added nav/navbar

CSS
- added some styles in homepage_view

=====================================================================================================================
	
v3.0 | Picstorage

Changes Author: Drexmir Mentiza
Changes:

Controller
- Inserted login and registration methods for Form Controller (see Form.php)
- Implemented a message where user needs to verify email first (see register_success() method)

Model
- Inserted insert_userdata method for registration (see Form_model.php)

Views
- Added view for login
- Added view for registration

Folder
- Added frontend_img folder for frontend images uploads

Additional Notes:
• Registration Module - working
• Login Module - working 
• CSS implemented for login and registration are server side, included some internal css

=====================================================================================================================

v4.0 | Picstorage

Changes Author: Mar Danniel Ginturo
Changes:

Controller
- fixed errors

JS
- updateCounters (unstable)

=====================================================================================================================

v5.0 | Picstorage

Changes Author: Mar Danniel Ginturo
Changes:

$config
- added email.php

Controller
- updated Form
	- added email sending function for verification

Model
- updated Form_model 
	- added methods for email verification
	- updated validateUser

Database
- added verification_code and verification_status column (kindly implement new sql file)


=====================================================================================================================

v6.0 | Picstorage

Changes Author: Mar Danniel Ginturo
Changes:

Views
- updated login
	- changed "Login Page" a link href


=====================================================================================================================

v7.0 | Picstorage

Changes Author: Gabriel Gueverra
Changes:

Controller
- added viewImage

Views
- updated homepage_view
	- removed modal for view image
- added viewImage


=====================================================================================================================

v8.0 | Picstorage

Changes Author: Mar Danniel Ginturo
Changes:

Controller
- updated Search
	- added addLike
	- added removeLike

Model
- updated Picture_model
	- added getSimilarPhotos
	- added incrementLikes
	- added decrementLikes
	- removed update_picture_likes

Views
- updated viewImage
	- added jQuery for likes/unlike function

JS
- removed updateCounters

=====================================================================================================================

v9.0 | Picstorage

Changes Author: Mar Danniel Ginturo
Changes:

Controller
- updated all controllers
	- for alerts, toast, etc

Views
- updated all Views
	- for alerts, toast, etc
