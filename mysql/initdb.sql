SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

load data infile 'C:/xampp/htdocs/projet_db/resources/scooters.csv' 
into table Scooter
fields terminated by ';'
lines terminated by '\n'
IGNORE 1 LINES
(id, dateCommissioning, model, complain, reloadLevel);

load data infile 'C:/xampp/htdocs/projet_db/resources/reloads.csv' 
into table Reload
fields terminated by ','
lines terminated by '\n'
IGNORE 1 LINES
(scooter, user, initialLoad, finalLoad, sourceX, sourceY, destinationX, destinationY, startTime, endTime);


load data infile 'C:/xampp/htdocs/projet_db/resources/trips.csv' 
into table Trip
fields terminated by ','
lines terminated by '\n'
IGNORE 1 LINES
(scooter, user, sourceX, sourceY, destinationX, destinationY, startTime, endTime);

update Trip
set distance = SQRT(POWER(destinationY-sourceY,2)+POWER(destinationX-sourceX,2));

load data infile 'C:/xampp/htdocs/projet_db/resources/reparations.csv' 
into table Reparation
fields terminated by ','
lines terminated by '\n'
IGNORE 1 LINES
(scooter, user, mechanic, dateComplain, dateReparation);

update scooter s
inner join (select r.scooter temp1, case when r.m>t.m then r.destinationX 
                        when r.m<t.m then t.destinationX
                        else t.destinationX 
                  end temp2,
                  case when r.m>t.m then r.destinationY 
                        when r.m<t.m then t.destinationY
                        else t.destinationY
                  end temp3
      from (select scooter, max(endtime) m, destinationX, destinationY from reload group by scooter) r,
            (select scooter, max(endtime) m, destinationX, destinationY from Trip group by scooter) t 
      where r.scooter = t.scooter) temp
on temp.temp1 = s.id
set s.positionX = temp.temp2, s.positionY = temp.temp3;

SHOW WARNINGS;

