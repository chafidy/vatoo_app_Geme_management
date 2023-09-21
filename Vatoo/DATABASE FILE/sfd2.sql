-- Table structure for table 'expenses'
CREATE TABLE expenses (
  expense_id NUMBER(20) PRIMARY KEY,
  user_id VARCHAR2(15) NOT NULL,
  expense NUMBER(20) NOT NULL,
  expensedate VARCHAR2(15) NOT NULL,
  expensecategory VARCHAR2(50) NOT NULL
);

-- Table structure for table 'users'
CREATE TABLE users (
  user_id NUMBER(11) PRIMARY KEY,
  firstname VARCHAR2(50) NOT NULL,
  lastname VARCHAR2(25) NOT NULL,
  email VARCHAR2(50) NOT NULL,
  profile_path VARCHAR2(50) DEFAULT 'default_profile.png' NOT NULL,
  password VARCHAR2(50) NOT NULL,
  trn_date TIMESTAMP NOT NULL
);

-- Indexes for table 'expenses'
CREATE SEQUENCE expenses_seq;
CREATE OR REPLACE TRIGGER expenses_trigger
BEFORE INSERT ON expenses
FOR EACH ROW
BEGIN
  :new.expense_id := expenses_seq.nextval;
END;
/

-- Indexes for table 'users'
CREATE SEQUENCE users_seq;
CREATE OR REPLACE TRIGGER users_trigger
BEFORE INSERT ON users
FOR EACH ROW
BEGIN
  :new.user_id := users_seq.nextval;
END;
/