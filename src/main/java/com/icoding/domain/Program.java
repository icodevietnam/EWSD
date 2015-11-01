package com.icoding.domain;

import java.util.List;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToMany;
import javax.persistence.ManyToOne;
import javax.persistence.Table;

import org.hibernate.annotations.GenericGenerator;

@Entity
@Table(name = "program")
public class Program {

	@Id
	@GenericGenerator(name = "seq_id", strategy = "com.icoding.generator.ProgramCodeGenerator")
	@GeneratedValue(generator = "seq_id")
	@Column(name = "code", unique = true, nullable = false, length = 20)
	private String code;

	@Column(name = "name")
	private String name;

	@Column(name = "description")
	private String description;

	@ManyToOne
	@JoinColumn(name = "faculty")
	private Faculty faculty;

	@ManyToOne
	@JoinColumn(name = "ee")
	private User ee;

	@ManyToMany(fetch = FetchType.LAZY, mappedBy = "listPrograms")
	private List<User> listStudents;

	@Column(name = "type_grade")
	private String typeOfGrade;

	@Column(name = "type_conduct")
	private String typeOfConduct;

	@Column(name = "academic_year")
	private String academicYear;

	public String getCode() {
		return code;
	}

	public void setCode(String code) {
		this.code = code;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getDescription() {
		return description;
	}

	public void setDescription(String description) {
		this.description = description;
	}

	public Faculty getFaculty() {
		return faculty;
	}

	public void setFaculty(Faculty faculty) {
		this.faculty = faculty;
	}

	public User getEe() {
		return ee;
	}

	public void setEe(User ee) {
		this.ee = ee;
	}

	public List<User> getListStudents() {
		return listStudents;
	}

	public void setListStudents(List<User> listStudents) {
		this.listStudents = listStudents;
	}

	public String getAcademicYear() {
		return academicYear;
	}

	public void setAcademicYear(String academicYear) {
		this.academicYear = academicYear;
	}

}
