<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ taglib uri="http://tiles.apache.org/tags-tiles" prefix="tiles"%>
<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<tiles:insertDefinition name="defaultTemplate">
	<tiles:putAttribute name="body">
		<form method="POST" action="<c:url value='/uploadFile'/>" enctype="multipart/form-data">
			File to upload: <input type="file" name="file"><br /> Name:
			<input type="text" name="name"><br /> <br /> <input
				type="submit" value="Upload"> Press here to upload the file!
		</form>
	</tiles:putAttribute>
</tiles:insertDefinition>