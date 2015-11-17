package com.icoding.service;

import com.icoding.domain.Report;

public interface ReportService extends GenericService<Report, Integer> {
	Boolean isReportExist(int studentId,String code);
}
