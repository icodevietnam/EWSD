package com.icoding.dao;

import java.util.List;

import org.springframework.stereotype.Repository;

import com.icoding.domain.Report;

@Repository
public class ReportDaoImpl extends GenericDaoImpl<Report, Integer> implements
		ReportDao {

	@Override
	public Boolean isReportExist(int studentId, String code) {
		Boolean flag = false;
		List<Report> listReports = getAll();
		for(Report report : listReports){
			if(report.getProgram().getCode().equalsIgnoreCase(code) && report.getStudent().getId() == studentId){
				flag = true;
				break;
			}
		}
		return flag;
	}
}
