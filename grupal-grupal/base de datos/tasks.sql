DROP DATABASE tasks;
create database tasks
use tasks
CREATE TABLE tasks (
  `taskId` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `taskTitle` varchar(255) NOT NULL,
  `taskDue` date NOT NULL
) 

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE users (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) 
--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`email`, `password`) VALUES
('ronaldo12roni@gmail.com', 'cruscaya');


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tasks`
--
ALTER TABLE tasks
  ADD PRIMARY KEY (`taskId`),
  ADD KEY `email` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE users
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tasks`
--
ALTER TABLE tasks
  MODIFY `taskId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tasks`
--
ALTER TABLE tasks
  ADD CONSTRAINT `email` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;