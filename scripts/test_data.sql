-- Insert rows into table 'food'
INSERT INTO food
VALUES
( -- first row: values for the columns
 1, 'vegetable_rice_and_curry', 'plate_service', 350, 'full'
),
( -- second row: values for the columns
 2, 'chicken_rice_and_curry', 'plate_service', 280, 'half'
);

-- Insert rows into table 'room'
INSERT INTO room
VALUES
( -- first row: values for the columns
 1, 'single', 'occupied', '1st_floor', 5000
),
( -- second row: values for the columns
 2, 'single', 'vacant', '1st_floor', 5000
),
( -- third row: values for the columns
 101, 'family', 'vacant', '2nd_floor', 12000
),
( -- fourth row: values for the columns
 102, 'family', 'occupied', '2nd_floor', 12000
);

-- Insert rows into table 'facility'
INSERT INTO facility
VALUES
( -- first row: values for the columns
 1, 'spa', 'luxury', 2000, '4th_floor'
),
( -- second row: values for the columns
 2, 'public_computer', 'normal', 200, '1st_floor'
),
( -- third row: values for the columns
 3, 'pool', 'luxury', 6000, 'outdoor'
),
( -- fourth row: values for the columns
 4, 'playground', 'normal', 1500, 'outdoor'
);

-- Insert rows into table 'outdoor_guiding_req'
INSERT INTO outdoor_guiding_req
VALUES
( -- first row: values for the columns in the list above
 4, 'lorem'
);

-- Insert rows into table 'outdoor_special_req'
INSERT INTO outdoor_special_req
VALUES
( -- first row: values for the columns in the list above
 3, 'ipsum'
);

-- Insert rows into table 'indoor_req'
INSERT INTO indoor_req
VALUES
( -- first row: values for the columns in the list above
 1, 'ipsum'
),
( -- second row: values for the columns in the list above
 2, 'ipsum'
);

-- Insert rows into table 'guest'
INSERT INTO guest
VALUES
( -- first row: values for the columns
 1, 'company'
),
( -- second row: values for the columns
 2, 'individual'
),
( -- third row: values for the columns
 3, 'family'
);

-- Insert rows into table 'company'
INSERT INTO company
VALUES
( -- first row: values for the columns
 1, 'Hayleys_PLC', 'No.400 Ven Baddegama Wimalawansa Mawatha, Colombo 01000', 1
);

-- Insert rows into table 'individual'
INSERT INTO individual
VALUES
( -- first row: values for the columns
 790029871, 'Saman_Kumara', 'M', 2
);

-- Insert rows into table 'family'
INSERT INTO family
VALUES
( -- first row: values for the columns
 670015893, 'Sumith_Perera', 'M', 3
);

-- Insert rows into table 'contact'
INSERT INTO contact
VALUES
( -- first row: values for the columns
 0112696331, 1
),
( -- second row: values for the columns
 0773465125, 1
),
( -- third row: values for the columns
 0708954342, 2
),
( -- fourth row: values for the columns
 0714576453, 3
),
( -- fifth row: values for the columns
 0716734235, 3
);

-- Insert rows into table 'employee'
INSERT INTO employee
VALUES
( -- first row: values for the columns
 1, 'Sarath_Fernando', 'M', 0764538974, '2002-08-20 08:00:00', 'M-1'
),
( -- second row: values for the columns
 2, 'Kumari_Gunawardana', 'F', 0753965937, '2015-06-12 08:00:00', 'M-2'
),
( -- third row: values for the columns
 3, 'Gunapala', 'M', 0713457323, '2010-08-21 08:00:00', 'CL-1'
),
( -- fourth row: values for the columns
 4, 'Pawani_Gunathilaka', 'F', 0713344556, '2018-09-11 08:00:00', 'R-1'
),
( -- fifth row: values for the columns
 5, 'Sumith_Wijewardana', 'M', 0700982823, '2018-10-16 08:00:00', 'CH-1'
),
( -- sizth row: values for the columns
 6, 'Ruwani_Perera', 'F', 0714683517, '2020-06-01 08:00:00', 'KP-1'
),
( -- first row: values for the columns
 7, 'Nuwan_Pradeep', 'M', 0768065116, '2020-07-11 08:00:00', 'W-1'
);

-- Insert rows into table 'management'
INSERT INTO management
VALUES
( -- first row: values for the columns
 1, 'E-1', 'executive', 1
),
( -- second row: values for the columns
 2, 'SS-1', 'assistant', 2
);

-- Insert rows into table 'cleaning_staff'
INSERT INTO cleaning_staff
VALUES
( -- first row: values for the columns
 1, 'sweeping', '1st_floor', 3
);

-- Insert rows into table 'receptionist'
INSERT INTO receptionist
VALUES
( -- first row: values for the columns
 1, 4
);

-- Insert rows into table 'kitchen_staff'
INSERT INTO kitchen_staff
VALUES
( -- first row: values for the columns
 1, 'executive_chef', '7_years', 5
),
( -- second row: values for the columns
 2, 'kitchen_porter', '1_year', 6
),
( -- third row: values for the columns
 3, 'waiter', '2_years', 7
);

-- Insert rows into table 'chef'
INSERT INTO chef
VALUES
( -- first row: values for the columns
 1, 1
);

-- Insert rows into table 'speciality_area'
INSERT INTO speciality_area
VALUES
( -- first row: values for the columns
 'caterer', 1
),
( -- second row: values for the columns
 'personal_chef', 1
);

-- Insert rows into table 'support_staff'
INSERT INTO support_staff
VALUES
( -- first row: values for the columns
 1, 6, 2
);

-- Insert rows into table 'waiter'
INSERT INTO waiter
VALUES
( -- first row: values for the columns
 1, 3
);

-- Insert rows into table 'speciality_style'
INSERT INTO speciality_style
VALUES
( -- first row: values for the columns
 1, 'french_service'
),
( -- second row: values for the columns
 1, 'english_service'
);