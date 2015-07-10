-- --------------------------------------------------------

--
-- Create a views for legacy tables
--

CREATE VIEW `ucm_base` AS SELECT * FROM `content_ucm_base`;
CREATE VIEW `ucm_content` AS SELECT * FROM `content_ucm_core`;
