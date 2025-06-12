package com.Assignment2.springboot.backend.repository;

import com.Assignment2.springboot.backend.model.Product;
import org.springframework.data.jpa.repository.JpaRepository;

public interface ProductRepository extends JpaRepository<Product, Integer>  {
}
