-- Up Migration: Create portfolio_visits table
CREATE TABLE IF NOT EXISTS `if0_42319175_portfolio_visits` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    
    -- Traffic & Tracking Source
    `tracking_source` VARCHAR(255) NOT NULL DEFAULT 'Direct / Unknown',
    `tracking_type` VARCHAR(50) NOT NULL DEFAULT 'direct', -- custom_token, utm, referrer, direct
    
    -- Context
    `landing_page` VARCHAR(255) NOT NULL,
    `full_url` TEXT NOT NULL,
    `browser_language` VARCHAR(50) NULL,
    
    -- Network & Geolocation (To be populated by your backend API)
    `ip_address` VARCHAR(45) NULL,                       -- Supports IPv4 and IPv6
    `country` VARCHAR(100) NULL,
    `city` VARCHAR(100) NULL,
    `organization` VARCHAR(255) NULL,                    -- ISP or Corporate Network Name
    
    -- Device Context
    `screen_resolution` VARCHAR(50) NULL,
    `viewport_size` VARCHAR(50) NULL,
    `user_agent` TEXT NULL,
    
    -- Timestamps
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    -- Performance Indexes for fast analytics queries
    INDEX `idx_created_at` (`created_at`),
    INDEX `idx_tracking_source` (`tracking_source`),
    INDEX `idx_tracking_type` (`tracking_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;