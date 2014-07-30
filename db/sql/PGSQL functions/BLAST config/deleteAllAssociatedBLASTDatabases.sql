 
CREATE OR REPLACE FUNCTION deleteAllAssociatedBLASTDatabases(
    pConfigurationId integer)
  RETURNS integer AS $$
DECLARE
    pConfigurationId ALIAS FOR $1;
    
BEGIN    

    DELETE FROM tbl_ebidatabasesxblastuserconfiguration
	WHERE idtbl_blastuserconfiguration = pConfigurationId;

RETURN 1;

END;

$$ LANGUAGE plpgsql;