 
CREATE OR REPLACE FUNCTION saveBLASTConfiguration(
    pUserName character, pJobTitle character, pSequenceType character, pProgram character, pScores integer, pAlignments character, pExpectValThreshold character)
  RETURNS integer AS $$
DECLARE
    pUserName ALIAS FOR $1;
    pJobTitle ALIAS FOR $2;
    pSequenceType ALIAS FOR $3;
    pProgram ALIAS FOR $4;
    pScores ALIAS FOR $5;
    pAlignments ALIAS FOR $6;
    pExpectValThreshold ALIAS FOR $7;
    
    id_tbl_user INTEGER;
    id_tbl_blastuserconfiguration INTEGER;
    
BEGIN    

    SELECT idtbl_user INTO id_tbl_user
            FROM tbl_User
            WHERE username = pUserName
            LIMIT 1;

    SELECT idtbl_blastuserconfiguration INTO id_tbl_blastuserconfiguration
        FROM tbl_blastuserconfiguration
        WHERE idtbl_user = id_tbl_user;

    IF id_tbl_blastuserconfiguration IS NOT NULL THEN
        UPDATE tbl_blastuserconfiguration
        SET jobtitle = pJobTitle, sequencetype = pSequenceType, program = pProgram, scores = pScores, alignments = pAlignments, expectvalthreshold = pExpectValThreshold
        WHERE idtbl_blastuserconfiguration = id_tbl_blastuserconfiguration;
    ELSE
        INSERT INTO tbl_blastuserconfiguration (jobtitle,sequencetype,program,scores,alignments,expectvalthreshold,idtbl_user)
        VALUES (pJobTitle, pSequenceType, pProgram, pScores, pAlignments, pExpectValThreshold, id_tbl_user)
        RETURNING idtbl_blastuserconfiguration into id_tbl_blastuserconfiguration;
    END IF;

RETURN id_tbl_blastuserconfiguration;

END;

$$ LANGUAGE plpgsql;