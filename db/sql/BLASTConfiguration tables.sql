CREATE TABLE tbl_EBIDatabases(
    idtbl_EBIDatabases BIGSERIAL NOT NULL,
    DatabaseName character varying(500) NOT NULL,
    DatabaseValue character varying(50) NOT NULL,

    primary key(idtbl_EBIDatabases)
);

CREATE TABLE tbl_BLASTUserConfiguration (
        idtbl_BLASTUserConfiguration BIGSERIAL NOT NULL,
        JobTitle character varying(500),
        SequenceType character varying(50) NOT NULL,
        Program character varying(50) NOT NULL,
        Scores INTEGER,
        Alignments character varying(50),
        ExpectValThreshold character varying(50),

        primary key(idtbl_BLASTUserConfiguration),

        idtbl_User BIGINT NOT NULL,
        CONSTRAINT "FK_tbl_BLASTUserConfiguration_tbl_User" FOREIGN KEY(idtbl_User) REFERENCES tbl_User(idtbl_User)
);


-- intermediate table for n to m relation
CREATE TABLE tbl_EBIDatabasesXBLASTUserConfiguration(
    idtbl_EBIDatabasesXBLASTUserConfiguration BIGSERIAL NOT NULL,
    
    primary key(idtbl_EBIDatabasesXBLASTUserConfiguration),

    idtbl_EBIDatabases BIGINT NOT NULL,
    idtbl_BLASTUserConfiguration BIGINT NOT NULL,
    CONSTRAINT "FK_tbl_EBIDatabasesXBLASTUserConfiguration_tbl_EBIDatabases" FOREIGN KEY(idtbl_EBIDatabases) REFERENCES tbl_EBIDatabases(idtbl_EBIDatabases),
    CONSTRAINT "FK_tbl_EBIDatabasesXBLASTUserConfiguration_tbl_BLASTUserConfiguration" FOREIGN KEY(idtbl_BLASTUserConfiguration) REFERENCES tbl_BLASTUserConfiguration(idtbl_BLASTUserConfiguration)
);