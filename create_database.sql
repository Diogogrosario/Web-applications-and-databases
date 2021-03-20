DROP TABLE IF EXISTS "country";
CREATE TABLE "country" (
    countryID SERIAL PRIMARY KEY,
    name text NOT NULL CONSTRAINT country_name_uk UNIQUE
); 

DROP TABLE IF EXISTS photo;
CREATE TABLE photo (
    photoID SERIAL PRIMARY KEY,
    path text NOT NULL 
);

DROP TABLE IF EXISTS address;
CREATE TABLE address (
    addressID SERIAL PRIMARY KEY,
    city text NOT NULL,
    street text NOT NULL,
    zip_code text NOT NULL,
    countryID INTEGER REFERENCES "country"(countryID) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS "user";
CREATE TABLE "user" (
    userID SERIAL PRIMARY KEY,
    username text NOT NULL CONSTRAINT username_uk UNIQUE,
    email text NOT NULL CONSTRAINT user_email_uk UNIQUE,
    first_name text NOT NULL,
    last_name text NOT NULL,
    password text NOT NULL,
    img INTEGER REFERENCES photo(photoID) ON UPDATE CASCADE,
    billingAddress INTEGER REFERENCES address(addressID) ON UPDATE CASCADE,
    shippingAddress INTEGER REFERENCES address(addressID) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS "admin";
CREATE TABLE "admin" (
    adminID INTEGER REFERENCES "user"(userID) ON UPDATE CASCADE PRIMARY KEY
);

DROP TABLE IF EXISTS authenticated;
CREATE TABLE authenticated (
    authenticatedID INTEGER REFERENCES "user"(userID) ON UPDATE CASCADE PRIMARY KEY,
    balance money DEFAULT 0 NOT NULL
);
 
DROP TABLE IF EXISTS review;
CREATE TABLE review (
    reviewID SERIAL PRIMARY KEY,
    userID INTEGER REFERENCES authenticated(authenticatedID) ON UPDATE CASCADE,
    comment text,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    rating INTEGER NOT NULL CONSTRAINT rating_ck CHECK (((rating > 0) AND (rating <= 5)))
);

DROP TABLE IF EXISTS category;
CREATE TABLE category (
    categoryID SERIAL PRIMARY KEY,
    name text NOT NULL UNIQUE
);
 
DROP TABLE IF EXISTS details;
CREATE TABLE detail (
    detailID SERIAL PRIMARY KEY,
    name text NOT NULL UNIQUE
);

DROP TABLE IF EXISTS item;
CREATE TABLE item (
    itemID SERIAL PRIMARY KEY,
    name text NOT NULL,
    stock INTEGER NOT NULL CONSTRAINT pos_stock CHECK (stock >= 0),
    brief_description text,
    description text NOT NULL,
    price MONEY NOT NULL CONSTRAINT pos_price CHECK (price >= 0::MONEY),
    isArchived BOOLEAN NOT NULL DEFAULT false,
    categoryID INTEGER REFERENCES category (categoryID) ON UPDATE CASCADE
);
 
DROP TABLE IF EXISTS ban;
CREATE TABLE ban (
    adminID INTEGER NOT NULL REFERENCES "admin"(adminID) ON UPDATE CASCADE,
    userID INTEGER NOT NULL REFERENCES "user" (userID) ON UPDATE CASCADE,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    reason text NOT NULL,
    PRIMARY KEY (adminID, userID)
);

DROP TABLE IF EXISTS purchase;
CREATE TABLE purchase (
    purchaseID SERIAL PRIMARY KEY,
    userID INTEGER REFERENCES authenticated (authenticatedID) ON UPDATE CASCADE,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL
);
 
DROP TABLE IF EXISTS purchaseItem;
CREATE TABLE purchaseItem (
    purchaseID INTEGER NOT NULL REFERENCES purchase (purchaseID) ON UPDATE CASCADE,
    itemID INTEGER NOT NULL REFERENCES item (itemID) ON UPDATE CASCADE,
    price MONEY NOT NULL,
    quantity INTEGER NOT NULL CONSTRAINT quantity_more_zero CHECK (quantity > 0),
    PRIMARY KEY (purchaseID, itemID)
);

DROP TABLE IF EXISTS advertisement;
CREATE TABLE advertisement (
    advertisementID INTEGER PRIMARY KEY,
    title text NOT NULL,
    beginDate TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    endDate TIMESTAMP WITH TIME zone NOT NULL,
    photoID INTEGER REFERENCES photo (photoID) ON UPDATE CASCADE,
    CONSTRAINT ad_dates_ck CHECK (beginDate < endDate)
);

DROP TABLE IF EXISTS itemPhoto;
CREATE TABLE itemPhoto (
    photoID INTEGER NOT NULL REFERENCES photo (photoID) ON UPDATE CASCADE PRIMARY KEY,
    itemID INTEGER NOT NULL REFERENCES item (itemID) ON UPDATE CASCADE

);
 
DROP TABLE IF EXISTS cart;
CREATE TABLE cart (
    userID INTEGER REFERENCES authenticated (authenticatedID) ON UPDATE CASCADE,
    itemID INTEGER NOT NULL REFERENCES item (itemID) ON UPDATE CASCADE,
    addDate TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    quantity INTEGER NOT NULL CONSTRAINT quantity_more_zero CHECK (quantity > 0),
    PRIMARY KEY (userID, itemID)
);
 
DROP TABLE IF EXISTS wishlist;
CREATE TABLE wishlist (
    userID INTEGER REFERENCES authenticated (authenticatedID) ON UPDATE CASCADE,
    itemID INTEGER NOT NULL REFERENCES item (itemID) ON UPDATE CASCADE,
    addDate TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    PRIMARY KEY (userID, itemID)
);

DROP TABLE IF EXISTS discount;
CREATE TABLE discount (
    discountID SERIAL PRIMARY KEY,
    "percentage" INTEGER NOT NULL CONSTRAINT valid_percentage CHECK ((("percentage" > 0) AND ("percentage" <= 100))),
    beginDate TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    endDate TIMESTAMP WITH TIME zone NOT NULL,
    CONSTRAINT ad_dates_ck CHECK (beginDate < endDate)
);

DROP TABLE IF EXISTS "notification";
CREATE TABLE "notification" (
    notificationID SERIAL PRIMARY KEY
    
);

DROP TABLE IF EXISTS discountNotification;
CREATE TABLE discountNotification (
    notificationID INTEGER NOT NULL REFERENCES discount (discountID) ON UPDATE CASCADE PRIMARY KEY,
    discountID INTEGER NOT NULL REFERENCES discount (discountID) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS stockNotification;
CREATE TABLE stockNotification (
    notificationID SERIAL PRIMARY KEY
);

DROP TABLE IF EXISTS applyDiscount;
CREATE TABLE applyDiscount (
    itemID INTEGER NOT NULL REFERENCES item (itemID) ON UPDATE CASCADE,
    discountID INTEGER NOT NULL REFERENCES discount (discountID) ON UPDATE CASCADE,
    PRIMARY KEY (itemID, discountID)
);

DROP TABLE IF EXISTS itemDetail;
CREATE TABLE itemDetail (
    itemID INTEGER NOT NULL REFERENCES item (itemID) ON UPDATE CASCADE,
    detailID INTEGER NOT NULL REFERENCES detail (detailID) ON UPDATE CASCADE,
    detailInfo text NOT NULL,
    PRIMARY KEY (detailID, itemID)
);

DROP TABLE IF EXISTS categoryDetail;
CREATE TABLE categoryDetail (
    categoryID INTEGER NOT NULL REFERENCES category (categoryID) ON UPDATE CASCADE,
    detailID INTEGER NOT NULL REFERENCES detail (detailID) ON UPDATE CASCADE,
    PRIMARY KEY (categoryID, detailID)
);
