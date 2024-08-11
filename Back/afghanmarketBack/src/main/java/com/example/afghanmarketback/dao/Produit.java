package com.example.afghanmarketback.dao;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

@Entity
@AllArgsConstructor
@NoArgsConstructor
@Setter
@Getter
public class Produit {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    Long id;

    String nom;
    String marque;
    String categorie;
    String poids;
    double prix;
    String provenance;
    String image;

}
