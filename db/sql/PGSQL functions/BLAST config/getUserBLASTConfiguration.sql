CREATE OR REPLACE FUNCTION getUserBLASTConfiguration(pUsername character)
  RETURNS TABLE(
	idtbl_user BIGINT,
	idtbl_blastuserconfiguration BIGINT,
	email CHARACTER, 
	jobtitle CHARACTER, 
	sequencetype CHARACTER, 
	program CHARACTER, 
	scores INTEGER, 
	alignments CHARACTER, 
	expectvalthreshold CHARACTER) AS
$BODY$
	SELECT idtbl_user, idtbl_blastuserconfiguration, email, jobtitle, sequencetype, program, scores, alignments, expectvalthreshold
		FROM tbl_User INNER JOIN tbl_blastuserconfiguration USING (idtbl_user)
		WHERE username = $1 --corresponds to pUserName
		LIMIT 1;

$BODY$
  LANGUAGE sql;