-- --------------------------------------------------------

--
-- Create a views for legacy tables
--

CREATE VIEW `tags` AS SELECT * FROM `content_tags`;
CREATE VIEW `contentitem_tag_map` AS SELECT * FROM `content_tags_map`;

