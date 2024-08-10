import { startStimulusApp } from '@symfony/stimulus-bridge';

console.log('Bootstraping Stimulus app...');
// Registers Stimulus controllers from controllers.json and in the controllers/ directory
export const app = startStimulusApp(require.context(
    '@symfony/stimulus-bridge/lazy-controller-loader!./controllers',
    true,
    /\.[jt]sx?$/
));
