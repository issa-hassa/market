package com.example.afghanmarketback.Service;


import com.example.afghanmarketback.dao.Produit;
import com.example.afghanmarketback.dao.ProduitRep;
import com.example.afghanmarketback.dto.ProduitDTO;
import lombok.AllArgsConstructor;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
@AllArgsConstructor
public class ProduitService {
    @Autowired
    private final ProduitRep produitRep;
    public List<Produit> getAll(){
        return produitRep.findAll();
    }
    public void createProduit(ProduitDTO produitDTO){
        Produit produit = convertDtoToEntity(produitDTO);
        produitRep.save(produit);
    }
    public Produit convertDtoToEntity(ProduitDTO produitDTO){
        Produit produit = new Produit();
        produit.setNom(produitDTO.getNom());
        produit.setPoids(produitDTO.getPoids());
        produit.setCategorie(produitDTO.getCategorie());
        produit.setMarque(produitDTO.getMarque());
        produit.setProvenance(produitDTO.getProvenance());
        produit.setImage(produitDTO.getImage());
        return produit;


    }
}
