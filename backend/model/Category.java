package com.Assignment2.springboot.backend.model;

import jakarta.persistence.*;
import lombok.Getter;
import lombok.Setter;

import java.util.List;

@Setter
@Getter
@Entity
@Table(name = "category")

public class Category {
    @Id
    @Column(name = "categoryId")
    private Integer categoryId;

    @Column(name = "categoryName")
    private String categoryName;

    /*@OneToMany(mappedBy = "category")
    private List<Product> products;*/
}
