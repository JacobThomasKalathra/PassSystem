<%@page contentType="text/html" pageEncoding="UTF-8"%>

<%@ page import="java.util.*"%>

<%@ page import="java.util.stream.*"%>

<%@ page import="java.net.*"%>

<!DOCTYPE html>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title></title>

</head>

<body>

	<%
	String value_11 = request.getHeader("idcs_remote_user") == null ? "" : request.getHeader("idcs_remote_user");

	String value_1 = request.getHeader("remote_user") == null ? "" : request.getHeader("remote_user");

	String value_2 = request.getHeader("OAM_REMOTE_USER") == null ? "" : request.getHeader("OAM_REMOTE_USER");

	String value_12 = request.getHeader("REMOTE_USER_GROUPS") == null ? "" : request.getHeader("REMOTE_USER_GROUPS");

	out.print("+++++++IDCS APPGATEWAY HEADER Values Start++++++++");

	out.print("Login Page : idcs_remote_user-User :: " + value_11);

	out.print("Login Page : REMOTE_USER_GROUPS :: " + value_12);

	out.print("Login Page : remote_user :: " + value_1);

	out.print("Login Page : OAM_REMOTE_USER-User :: " + value_2);

	out.print("+++++++IDCS APPGATEWAY HEADER Values END++++++++");
	
	String redirectURL = "site.jsp?OAM_REMOTE_USER="+request.getHeader("OAM_REMOTE_USER");
	response.setHeader("OAM_REMOTE_USER", request.getHeader("OAM_REMOTE_USER"));
	response.setStatus(302);
    response.sendRedirect(redirectURL);
	%>

</body>

</html>

