package com.icoding.dao;

import com.icoding.domain.Report;

public interface ReportDao extends GenericDao<Report, Integer> {
	Boolean isReportExist(int studentId,String code);
}
