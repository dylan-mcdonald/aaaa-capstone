CREATE TABLE swipe(
	swipeId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	swipeNumber INT UNSIGNED NOT NULL,
	swipeStatus INT UNSIGNED NOT NULL,
	INDEX (swipeId),
	PRIMARY KEY(swipeId)
);

CREATE TABLE placard(
	placardId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	placardNumber INT UNSIGNED NOT NULL,
	placardStatusId INT UNSIGNED NOT NULL,
	INDEX (placardId),
	PRIMARY KEY(placardId)
);

CREATE TABLE noteType(
	noteTypeId INT UNSIGNED NOT NULL,
	noteTypeName VARCHAR(40) NOT NULL,
	INDEX (noteTypeName),
	PRIMARY KEY(noteTypeId)
);

CREATE TABLE bridge(
	bridgeStaffId varchar(9),
	bridgeName varchar(64),
	bridgeUserName varchar(20),
	INDEX (bridgeStaffId),
	PRIMARY KEY(bridgeStaffId)
);

CREATE TABLE studentPermit(
	studentPermitStudentId INT NOT NULL,
	studentPermitSwipeId INT NOT NULL,
	studentPermitPlacardId INT NOT NULL,
	studentPermitCheckOutDate DATE NOT NULL,
	studentPermitCheckInDate DATE NOT NULL,
	INDEX (studentPermitStudentId),
	INDEX (studentPermitPlacardId),
	INDEX (studentPermitSwipeId),
	PRIMARY KEY(studentPermitStudentId),
	FOREIGN KEY(studentPermitSwipeId) REFERENCES swipe(swipeId),
	FOREIGN KEY(studentPermitPlacardId) REFERENCES placard(placardId)
);

CREATE TABLE prospect(
	prospectId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	prospectFirstName VARCHAR(40) NOT NULL,
	prospectLastName VARCHAR(40) NOT NULL,
	prospectEmail VARCHAR(100) NOT NULL,
	prospectPhoneNumber VARCHAR(30) NOT NULL,
	prospectCohortId INT UNSIGNED NOT NULL,
	INDEX (prospectId),
	PRIMARY KEY(prospectId),
	FOREIGN KEY(prospectCohortId) REFERENCES cohort(cohortId)
);

CREATE TABLE application(
	applicationId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	applicationFirstName VARCHAR(40) NOT NULL,
	applicationLastName VARCHAR(40) NOT NULL,
	applicationEmail VARCHAR(100) NOT NULL,
	applicationPhoneNumber VARCHAR(30) NOT NULL,
	applicationSource TEXT NOT NULL,
	applicationCohortId TEXT NOT NULL,
	applicationAboutYou TEXT NOT NULL,
	applicationHopeToAccomplish TEXT NOT NULL,
	applicationExperience TEXT NOT NULL,
	applicationDateTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	applicationUtmCampaign TEXT NOT NULL,
	applicationUtmMedium TEXT NOT NULL,
	applicationUtmSource TEXT NOT NULL,
	INDEX (applicationId),
	PRIMARY KEY(applicationId),
	FOREIGN KEY(applicationCohortId) REFERENCES cohort (cohortId)
);

CREATE TABLE note(
	noteNoteId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	noteStudentId INT NOT NULL,
	noteStatusId INT UNSIGNED NOT NULL,
	noteContent VARCHAR(2000) NOT NULL,
	INDEX (noteNoteId),
	PRIMARY KEY(noteNoteId),
	FOREIGN KEY(noteStudentId) REFERENCES noteNoteId(noteNoteId)
);

CREATE TABLE cohort(
	cohortId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	cohortApplicationId INT UNSIGNED NOT NULL,
	INDEX (cohortId),
	PRIMARY KEY(cohortId),
	FOREIGN KEY(cohortApplicationId) REFERENCES cohortApplication(cohortApplicationId)
);

CREATE TABLE status(
	statusTypeId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	statusTypeName INT NOT NULL,
	INDEX (statusTypeId),
	PRIMARY KEY (statusTypeId)
);

CREATE TABLE noteType (
	noteTypeId   INT UNSIGNED AUTO_INCREMENT NOT NULL,
	noteTypeName INT                         NOT NULL,
	INDEX (noteTypeId),
	PRIMARY KEY (noteTypeId),
	FOREIGN KEY (noteTypeName) REFERENCES noteTypeId (noteTypeId)
);
