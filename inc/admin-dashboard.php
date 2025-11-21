    public function dashboard_page() {
        // Get statistics
        $stats = $this->get_dashboard_stats();
        $bot_stats = $this->bot_protection->get_statistics();
        ?>
        <div class="wrap">
            <h1>📊 Lead Capture Dashboard</h1>
            
            <!-- Main Stats Cards -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin: 20px 0;">
                
                <!-- Total Leads Card -->
                <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div>
                            <h3 style="margin: 0; font-size: 14px; opacity: 0.9;">📝 Total Leads</h3>
                            <p style="margin: 5px 0 0 0; font-size: 32px; font-weight: bold;"><?php echo number_format($stats['total_leads']); ?></p>
                        </div>
                        <div style="font-size: 40px; opacity: 0.3;">📊</div>
                    </div>
                </div>
                
                <!-- This Month Card -->
                <div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div>
                            <h3 style="margin: 0; font-size: 14px; opacity: 0.9;">📅 This Month</h3>
                            <p style="margin: 5px 0 0 0; font-size: 32px; font-weight: bold;"><?php echo number_format($stats['this_month']); ?></p>
                        </div>
                        <div style="font-size: 40px; opacity: 0.3;">📈</div>
                    </div>
                </div>
                
                <!-- Blocked Bots Card -->
                <div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div>
                            <h3 style="margin: 0; font-size: 14px; opacity: 0.9;">🛡️ Blocked Bots</h3>
                            <p style="margin: 5px 0 0 0; font-size: 32px; font-weight: bold;"><?php echo number_format($bot_stats['total_blocked']); ?></p>
                        </div>
                        <div style="font-size: 40px; opacity: 0.3;">🤖</div>
                    </div>
                </div>
                
                <!-- Success Rate Card -->
                <div style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); color: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div>
                            <h3 style="margin: 0; font-size: 14px; opacity: 0.9;">⚡ Success Rate</h3>
                            <p style="margin: 5px 0 0 0; font-size: 32px; font-weight: bold;"><?php echo $stats['success_rate']; ?>%</p>
                        </div>
                        <div style="font-size: 40px; opacity: 0.3;">✨</div>
                    </div>
                </div>
            </div>
            
            <!-- Form Performance Section -->
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin: 20px 0;">
                
                <!-- Form Performance Chart -->
                <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <h2 style="margin-top: 0;">📊 Form Performance</h2>
                    
                    <?php foreach ($stats['form_performance'] as $form): ?>
                    <div style="margin-bottom: 15px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 5px;">
                            <span style="font-weight: 500;"><?php echo $form['name']; ?></span>
                            <span style="font-weight: bold; color: #666;"><?php echo $form['count']; ?> leads</span>
                        </div>
                        <div style="background: #f0f0f0; border-radius: 10px; height: 8px; overflow: hidden;">
                            <div style="background: <?php echo $form['color']; ?>; height: 100%; width: <?php echo $form['percentage']; ?>%; transition: width 0.3s ease;"></div>
                        </div>
                        <div style="font-size: 12px; color: #666; margin-top: 2px;"><?php echo $form['percentage']; ?>% of total leads</div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Quick Actions -->
                <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <h2 style="margin-top: 0;">🚀 Quick Actions</h2>
                    
                    <div style="margin-bottom: 15px;">
                        <a href="<?php echo admin_url('edit.php?post_type=lead'); ?>" style="display: block; padding: 12px; background: #f8f9fa; border-radius: 8px; text-decoration: none; color: #333; border-left: 4px solid #007cba;">
                            📋 View All Leads
                        </a>
                    </div>
                    
                    <div style="margin-bottom: 15px;">
                        <a href="<?php echo admin_url('edit.php?post_type=lead&page=lead-form-preview'); ?>" style="display: block; padding: 12px; background: #f8f9fa; border-radius: 8px; text-decoration: none; color: #333; border-left: 4px solid #00a32a;">
                            🎨 Preview Forms
                        </a>
                    </div>
                    
                    <div style="margin-bottom: 15px;">
                        <a href="<?php echo admin_url('edit.php?post_type=lead&page=lead-bot-protection'); ?>" style="display: block; padding: 12px; background: #f8f9fa; border-radius: 8px; text-decoration: none; color: #333; border-left: 4px solid #d63638;">
                            🛡️ Bot Protection
                        </a>
                    </div>
                    
                    <div style="margin-bottom: 15px;">
                        <a href="<?php echo admin_url('edit.php?post_type=lead&page=lead-plugin-updates'); ?>" style="display: block; padding: 12px; background: #f8f9fa; border-radius: 8px; text-decoration: none; color: #333; border-left: 4px solid #8c8f94;">
                            🔄 Plugin Updates
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Recent Activity -->
            <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin: 20px 0;">
                <h2 style="margin-top: 0;">📈 Recent Activity (Last 7 Days)</h2>
                
                <div style="display: grid; grid-template-columns: repeat(7, 1fr); gap: 10px; text-align: center;">
                    <?php foreach ($stats['recent_activity'] as $day): ?>
                    <div>
                        <div style="font-size: 12px; color: #666; margin-bottom: 5px;"><?php echo $day['date']; ?></div>
                        <div style="height: <?php echo max(20, $day['count'] * 3); ?>px; background: linear-gradient(to top, #667eea, #764ba2); border-radius: 4px; margin-bottom: 5px;"></div>
                        <div style="font-size: 14px; font-weight: bold;"><?php echo $day['count']; ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
    }
