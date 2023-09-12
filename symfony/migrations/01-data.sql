INSERT INTO category (title, created_at, modified_at)
VALUES ('Action', NOW(), NULL),
       ('Comédie', NOW(), NULL),
       ('Science-Fiction', NOW(), NULL),
       ('Drame', NOW(), NULL);

INSERT INTO franchise (name, created_at, modified_at)
VALUES ('Fast and Furious', NOW(), NULL),
       ('Harry Potter', NOW(), NULL),
       ('Star Wars', NOW(), NULL);

INSERT INTO movie (franchise_id, title, synopsis, created_by, created_at, modified_at)
VALUES (1, 'Fast & Furious 10', 'La course continue avec plus d\'action', 'Director 1', NOW(), NULL),
       (1, 'Fast & Furious 11', 'Les voitures les plus rapides du monde', 'Director 2', NOW(), NULL),
       (2, 'Harry Potter and the Chamber of Secrets', 'Harry découvre la Chambre des secrets', 'Director 3', NOW(), NULL),
       (2, 'Harry Potter and the Prisoner of Azkaban', 'La chasse au prisonnier d\'Azkaban commence', 'Director 4', NOW(), NULL),
       (3, 'Star Wars: Episode V - The Empire Strikes Back', 'La bataille continue contre l\'Empire', 'Director 5', NOW(), NULL),
       (3, 'Star Wars: Episode VI - Return of the Jedi', 'La conclusion de la saga', 'Director 6', NOW(), NULL),
       (1, 'Fast & Furious 12', 'Nouvelles voitures, nouvelles courses', 'Director 7', NOW(), NULL),
       (2, 'Harry Potter and the Goblet of Fire', 'La Coupe de Feu met Harry à l\'épreuve', 'Director 8', NOW(), NULL),
       (3, 'Star Wars: Episode VII - The Force Awakens', 'Le réveil de la Force', 'Director 9', NOW(), NULL),
       (1, 'Fast & Furious 13', 'La course ultime pour la liberté', 'Director 10', NOW(), NULL);

INSERT INTO movie_category (movie_id, category_id)
VALUES (1, 1),  -- Fast & Furious 10 - Action
       (2, 1),  -- Fast & Furious 11 - Action
       (3, 3),  -- Harry Potter and the Chamber of Secrets - Science-Fiction
       (4, 3),  -- Harry Potter and the Prisoner of Azkaban - Science-Fiction
       (5, 1),  -- Star Wars: Episode V - The Empire Strikes Back - Action
       (6, 1),  -- Star Wars: Episode VI - Return of the Jedi - Action
       (7, 1), -- Fast & Furious 12 - Action
       (8, 3), -- Harry Potter and the Goblet of Fire - Science-Fiction
       (9, 1), -- Star Wars: Episode VII - The Force Awakens - Action
       (10, 1); -- Fast & Furious 13 - Action
