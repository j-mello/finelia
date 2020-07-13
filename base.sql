CREATE TABLE Etudiant (

    id INT PRIMARY KEY AUTO_INCREMENT,
    nomEtudiant VARCHAR(50)
);

CREATE TABLE Matiere (

    id INT PRIMARY KEY AUTO_INCREMENT,
    nomMatiere VARCHAR(50),
    coefMatiere INT
);

CREATE TABLE Note (

    id INT PRIMARY KEY AUTO_INCREMENT,
    note INT,
    idEtudiant INT,
    idMatiere INT,
    FOREIGN KEY (idEtudiant) REFERENCES Etudiant(id),
    FOREIGN KEY (idMatiere) REFERENCES Matiere(id)
);

Insert into Etudiant (nomEtudiant) VALUES ('Tom'),('Katya'),('John');
Insert into Matiere (nomMatiere, coefMatiere) VALUES ('Front-end', 1), ('Back-end', 2);
Insert into note (note, idEtudiant, idMatiere) VALUES (15,1,1),(8,1,2),(16,2,1),(12,2,2),(7,3,1),(16,3,2);

select e.nomEtudiant, Round((SUM(n.note*m.coefMatiere)/ SUM(m.coefMatiere)),2) as 'Moyenne generale' from etudiant e, matiere m, note n where e.id = n.idEtudiant and m.id = n.idMatiere GROUP by e.nomEtudiant 