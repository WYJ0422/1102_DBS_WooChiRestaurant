CREATE TABLE USERS(
    u_id INT NOT NULL AUTO_INCREMENT,
    account VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(64) NOT NULL,
    
    PRIMARY KEY(u_id)
); 

CREATE TABLE CUSTOMER(
    u_id INT NOT NULL,
    c_name VARCHAR(50) NOT NULL UNIQUE,
    c_phone VARCHAR(10) NOT NULL,
    c_mail VARCHAR(50),
    c_points INT,
    
    PRIMARY KEY(u_id),
    FOREIGN KEY(u_id) REFERENCES USERS(u_id)
); 

CREATE TABLE RATE(
    r_id INT NOT NULL AUTO_INCREMENT,
    u_id INT NOT NULL,
    score INT NOT NULL,
    r_date DATE NOT NULL,
    r_content TEXT,
    
    PRIMARY KEY(r_id),
    FOREIGN KEY(u_id) REFERENCES USERS(u_id)
); 

CREATE TABLE ORDERS(
    o_id INT NOT NULL AUTO_INCREMENT,
    u_id INT NOT NULL,
    meal_time DATETIME NOT NULL,
    num_of_people INT NOT NULL,
    seat CHAR(2) NOT NULL,
    adoption CHAR(1),
    note TEXT NOT NULL,

    PRIMARY KEY(o_id),
    FOREIGN KEY(u_id) REFERENCES USERS(u_id)
); 

CREATE TABLE CONTACT(
    c_id INT NOT NULL AUTO_INCREMENT,
    u_id INT NOT NULL,
    c_content TEXT NOT NULL,
    c_date DATE NOT NULL,
    
    PRIMARY KEY(c_id),
    FOREIGN KEY(u_id) REFERENCES USERS(u_id)
);

CREATE TABLE RESTAURANT(
    u_id INT NOT NULL,
    name VARCHAR(10) NOT NULL UNIQUE,
    mail VARCHAR(50) NOT NULL,
    phone CHAR(10) NOT NULL,
    location VARCHAR(50) NOT NULL,
    opening_hour VARCHAR(50) NOT NULL,
    description TEXT,
    
    PRIMARY KEY(u_id),
    FOREIGN KEY(u_id) REFERENCES USERS(u_id)
); 

CREATE TABLE IMAGES(
    i_id INT NOT NULL AUTO_INCREMENT,
    u_id INT NOT NULL,
    image VARCHAR(50) NOT NULL UNIQUE,
    
    PRIMARY KEY(i_id),
    FOREIGN KEY(u_id) REFERENCES USERS(u_id)
); 

CREATE TABLE NEWS(
    n_id INT NOT NULL AUTO_INCREMENT,
    u_id INT NOT NULL,
    n_information TEXT NOT NULL,
    release_date DATE NOT NULL,
    
    PRIMARY KEY(n_id),
    FOREIGN KEY(u_id) REFERENCES USERS(u_id)
); 

CREATE TABLE PETS(
    p_id INT NOT NULL AUTO_INCREMENT,
    u_id INT NOT NULL,
    p_name VARCHAR(10) NOT NULL UNIQUE,
    photo VARCHAR(50) NOT NULL UNIQUE,
    gender CHAR(1) NOT NULL,
    age INT NOT NULL,
    size CHAR(3) NOT NULL,
    variety VARCHAR(50) NOT NULL,
    p_description TEXT,
    microchip CHAR(1),
    ligation CHAR(1),
    type CHAR(1),
    
    PRIMARY KEY(p_id),
    FOREIGN KEY(u_id) REFERENCES USERS(u_id)
);