
-- ---------------------------------------------
-- Creating roles 
CREATE ROLE IF NOT EXISTS hotel_admin, tier_one_emp, tier_two_emp, tier_three_emp, guest;

-- ---------------------------------------------
-- Granting access

-- Admin
GRANT ALL ON hotel_de_asiana.* TO hotel_admin;

-- Tier one employee
GRANT ALL ON hotel_de_asiana.guest TO tier_one_emp; 
GRANT ALL ON hotel_de_asiana.family TO tier_one_emp;
GRANT ALL ON hotel_de_asiana.company TO tier_one_emp; 
GRANT ALL ON hotel_de_asiana.individual TO tier_one_emp;
GRANT ALL ON hotel_de_asiana.guest_room TO tier_one_emp;
GRANT ALL ON hotel_de_asiana.guest_facility TO tier_one_emp;
GRANT ALL ON hotel_de_asiana.bill TO tier_one_emp;
GRANT ALL ON hotel_de_asiana.handle TO tier_one_emp;

GRANT SELECT ON hotel_de_asiana.room TO tier_one_emp;
GRANT SELECT ON hotel_de_asiana.facility TO tier_one_emp;
GRANT SELECT ON hotel_de_asiana.outdoor_special_req TO tier_one_emp;
GRANT SELECT ON hotel_de_asiana.outdoor_guiding_req TO tier_one_emp;
GRANT SELECT ON hotel_de_asiana.indoor_req TO tier_one_emp;
GRANT SELECT ON hotel_de_asiana.facility_manage TO tier_one_emp;
GRANT SELECT ON hotel_de_asiana.food_order TO tier_one_emp;
GRANT SELECT ON hotel_de_asiana.food TO tier_one_emp;

GRANT SELECT ON hotel_de_asiana.facility_view TO tier_one_emp;

-- Tier two employee
GRANT ALL ON hotel_de_asiana.food TO tier_two_emp;
GRANT ALL ON hotel_de_asiana.prepare TO tier_two_emp;

GRANT SELECT ON hotel_de_asiana.food_order TO tier_two_emp;

GRANT SELECT ON hotel_de_asiana.waiter_view TO tier_two_emp;
GRANT SELECT ON hotel_de_asiana.support_staff_view TO tier_two_emp;

-- Tier three employee
GRANT SELECT ON hotel_de_asiana.clean TO tier_three_emp;

-- Guest
GRANT ALL ON hotel_de_asiana.food_order TO guest;
GRANT ALL ON hotel_de_asiana.guest_facility TO guest;
GRANT SELECT ON hotel_de_asiana.facility TO guest;

GRANT SELECT ON hotel_de_asiana.outdoor_guiding_req TO guest;
GRANT SELECT ON hotel_de_asiana.outdoor_special_req TO guest;
GRANT SELECT ON hotel_de_asiana.indoor_req TO guest;
GRANT SELECT ON hotel_de_asiana.food TO guest;

GRANT SELECT ON hotel_de_asiana.facility_view TO guest;

-- -------------------------------------------------
-- Creating user types and assigning user privileges

-- Manager 
CREATE USER IF NOT EXISTS manager@localhost IDENTIFIED BY 'manager123';
GRANT hotel_admin TO manager@localhost;
SET DEFAULT ROLE ALL TO manager@localhost;

-- Receptionist
CREATE USER IF NOT EXISTS receptionist@localhost IDENTIFIED BY 'reception123';
GRANT tier_one_emp TO receptionist@localhost;
SET DEFAULT ROLE ALL TO receptionist@localhost;

-- Chef
CREATE USER IF NOT EXISTS chef@localhost IDENTIFIED BY 'chef123';
GRANT tier_two_emp TO chef@localhost;
SET DEFAULT ROLE ALL TO chef@localhost;

-- Cleaning staff
CREATE USER IF NOT EXISTS cleaning@localhost IDENTIFIED BY 'clean123';
GRANT tier_three_emp TO cleaning@localhost;
SET DEFAULT ROLE ALL TO cleaning@localhost;

-- Guest
CREATE USER IF NOT EXISTS guest@localhost IDENTIFIED BY 'guest123';
GRANT guest TO guest@localhost;
SET DEFAULT ROLE ALL TO guest@localhost;
