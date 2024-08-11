package com.example.afghanmarketback.dao;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.List;
import java.util.Optional;

@Repository
public interface ProduitRep extends JpaRepository<Produit, Long> {

    List<Produit> findAll();


    Optional<Produit> findById(Long aLong);


}
