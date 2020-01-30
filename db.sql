CREATE TABLE projects(
    project_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL DEFAULT ''
);

CREATE TABLE tasks(
    task_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    status VARCHAR(50) NOT NULL DEFAULT 'not ready',
    deadline_date DATETIME NOT NULL,
    project_id INT NOT NULL,
    PRIMARY KEY (task_id),
    FOREIGN KEY (project_id) REFERENCES projects(project_id)
);

INSERT INTO projects(name) VALUES ('Project #1');