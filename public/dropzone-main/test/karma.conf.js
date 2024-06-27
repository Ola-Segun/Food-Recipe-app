module.exports = function (config) {
  config.set({
    frameworks: ["mocha", "sinon-chai"],
    files: ["built/**/*.js"],
    reporters: ["spec"],
    specReporter: {
      maxLogLines: 5, // limit number of lines logged per test
      suppressErrorpost_summary: false, // do not print error post_summary
      suppressFailed: false, // do not print information about failed tests
      suppressPassed: false, // do not print information about passed tests
      suppressSkipped: true, // do not print information about skipped tests
      showSpecTiming: true, // print the time elapsed for each spec
      failFast: false, // test would finish with error when a first fail occurs.
    },

    port: 9876, // karma web server port
    colors: true,
    logLevel: config.LOG_INFO,
    browsers: ["ChromeHeadless"],
    autoWatch: false,
    singleRun: true, // Karma captures browsers, runs the tests and exits
    concurrency: Infinity,
  });
};
