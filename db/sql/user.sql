-- Table: tbl_user

-- DROP TABLE tbl_user;

CREATE TABLE tbl_user
(
  idtbl_user bigserial NOT NULL,
  username character varying(255) NOT NULL,
  password character varying(128) NOT NULL,
  email character varying(255),
  CONSTRAINT tbl_user_pkey PRIMARY KEY (idtbl_user),
  CONSTRAINT tbl_user_username_key UNIQUE (username)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE tbl_user
  OWNER TO "ePathway";
